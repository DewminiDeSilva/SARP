<?php

namespace App\Support;

/**
 * Derive birth year from Sri Lankan old (9 digits + V/X) and new (12-digit) NIC formats,
 * then classify youth using the same rule as the beneficiary family-member form (40 years or below).
 */
final class NicYouth
{
    /** Matches `if (age <= 40) { youth }` in beneficiary_index family member UI. */
    public const MAX_AGE_INCLUSIVE = 40;

    /**
     * Extract calendar birth year from NIC, or null if format is not recognized.
     *
     * New NIC: first four digits are full year (e.g. 199817701540 → 1998).
     * Old NIC: first two digits are yy; map to 19yy/20yy using current century window.
     */
    public static function extractBirthYear(?string $nic, ?int $referenceYear = null): ?int
    {
        if ($nic === null) {
            return null;
        }
        $nic = trim($nic);
        if ($nic === '') {
            return null;
        }

        if (preg_match('/^((?:19|20)\d{2})\d{8}$/', $nic, $m)) {
            $y = (int) $m[1];
            if ($y >= 1900 && $y <= 2100) {
                return $y;
            }

            return null;
        }

        if (preg_match('/^(\d{2})(\d{3})(\d{4})[VXvx]?$/', $nic, $m)) {
            $yy = (int) $m[1];
            $referenceYear ??= (int) date('Y');
            $refYy = $referenceYear % 100;

            return $yy <= $refYy ? (2000 + $yy) : (1900 + $yy);
        }

        return null;
    }

    public static function isYouthByNic(?string $nic, ?int $referenceYear = null): bool
    {
        $birthYear = self::extractBirthYear($nic, $referenceYear);
        if ($birthYear === null) {
            return false;
        }
        $referenceYear ??= (int) date('Y');
        $age = $referenceYear - $birthYear;

        return $age >= 0 && $age <= self::MAX_AGE_INCLUSIVE;
    }

    /**
     * Beneficiary with parseable NIC and NIC-derived age above 40 (complement of youth within classifiable records).
     */
    public static function isNotYouthByNic(?string $nic, ?int $referenceYear = null): bool
    {
        $birthYear = self::extractBirthYear($nic, $referenceYear);
        if ($birthYear === null) {
            return false;
        }
        $referenceYear ??= (int) date('Y');
        $age = $referenceYear - $birthYear;

        return $age > self::MAX_AGE_INCLUSIVE && $age <= 120;
    }
}
