<?php declare(strict_types = 1);

namespace Adbros\Utils;

use Nette\Utils\Strings;

class ValidatorsUtil
{

	/**
	 * Verifies that the value is valid IP address
	 */
	public static function isIp(string $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_IP) !== false;
	}

	/**
	 * Verifies that the value is strong password (contains 8 characters, 1 lowercase letter, 1 uppercase letter and 1 digit)
	 */
	public static function isPasswordStrong(string $value): bool
	{
		return Strings::match($value, '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/') !== null;
	}

}
