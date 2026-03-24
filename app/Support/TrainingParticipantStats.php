<?php

namespace App\Support;

use App\Models\AgricultureTrainingParticipant;
use App\Models\FFSParticipant;
use App\Models\FourpTrainingParticipant;
use App\Models\LivestockTrainingParticipant;
use App\Models\NrmParticipant;
use App\Models\NutritionTrainee;
use App\Models\Participant;
use App\Models\TankTrainingParticipant;
use App\Models\YouthTrainingParticipant;
use Illuminate\Database\Eloquent\Model;

class TrainingParticipantStats
{
    /**
     * Counts for one training program (scoped by foreign key).
     * Totals reflect the full program, not the current search filter.
     *
     * @param  class-string<Model>  $modelClass
     */
    public static function forProgram(string $modelClass, string $foreignKey, $programId): array
    {
        if (!is_subclass_of($modelClass, Model::class)) {
            throw new \InvalidArgumentException('Invalid Eloquent model class.');
        }

        $base = fn () => $modelClass::query()->where($foreignKey, $programId);

        $totalParticipants = $base()->count();
        $maleCount = $base()->whereRaw('LOWER(TRIM(gender)) = ?', ['male'])->count();
        $femaleCount = $base()->whereRaw('LOWER(TRIM(gender)) = ?', ['female'])->count();

        $youthCount = $base()->whereNotNull('age')
            ->whereRaw("NULLIF(TRIM(age), '') IS NOT NULL")
            ->whereRaw('CAST(age AS UNSIGNED) BETWEEN 18 AND 40')
            ->count();

        return compact('totalParticipants', 'maleCount', 'femaleCount', 'youthCount');
    }

    /**
     * Aggregate across all training-style participant tables (system-wide).
     */
    public static function aggregateAll(): array
    {
        $segments = [
            'training' => self::forModelClass(Participant::class),
            'agriculture_training' => self::forModelClass(AgricultureTrainingParticipant::class),
            'livestock_training' => self::forModelClass(LivestockTrainingParticipant::class),
            'tank_training' => self::forModelClass(TankTrainingParticipant::class),
            'youth_training' => self::forModelClass(YouthTrainingParticipant::class),
            'fourp_training' => self::forModelClass(FourpTrainingParticipant::class),
            'ffs' => self::forModelClass(FFSParticipant::class),
            'nrm' => self::forModelClass(NrmParticipant::class),
            'nutrition_trainee' => self::forNutritionTrainees(),
        ];

        return [
            'total_participants' => array_sum(array_column($segments, 'total_participants')),
            'male_count' => array_sum(array_column($segments, 'male_count')),
            'female_count' => array_sum(array_column($segments, 'female_count')),
            'youth_count' => array_sum(array_column($segments, 'youth_count')),
            'by_module' => $segments,
        ];
    }

    /**
     * @param  class-string<Model>  $modelClass
     */
    private static function forModelClass(string $modelClass): array
    {
        $base = fn () => $modelClass::query();

        return [
            'total_participants' => $base()->count(),
            'male_count' => $base()->whereRaw('LOWER(TRIM(gender)) = ?', ['male'])->count(),
            'female_count' => $base()->whereRaw('LOWER(TRIM(gender)) = ?', ['female'])->count(),
            'youth_count' => $base()->whereNotNull('age')
                ->whereRaw("NULLIF(TRIM(age), '') IS NOT NULL")
                ->whereRaw('CAST(age AS UNSIGNED) BETWEEN 18 AND 40')
                ->count(),
        ];
    }

    private static function forNutritionTrainees(): array
    {
        $base = fn () => NutritionTrainee::query();

        return [
            'total_participants' => $base()->count(),
            'male_count' => $base()->whereRaw('LOWER(TRIM(gender)) = ?', ['male'])->count(),
            'female_count' => $base()->whereRaw('LOWER(TRIM(gender)) = ?', ['female'])->count(),
            'youth_count' => $base()->whereNotNull('age')
                ->whereRaw("NULLIF(TRIM(age), '') IS NOT NULL")
                ->whereRaw('CAST(age AS UNSIGNED) BETWEEN 18 AND 40')
                ->count(),
        ];
    }
}
