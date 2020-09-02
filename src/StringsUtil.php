<?php declare(strict_types = 1);

namespace Adbros\Utils;

use Nette\Utils\Strings;

class StringsUtil
{

	/**
	 * Anonymize e-mail `john.doe@domain.com => jo*****e@domain.com`
	 */
	public static function anonymizeEmail(string $email): string
	{
		return Strings::replace($email, '/(?<!^)(?<!^.).(?=[^@]+@)/', '*');
	}

}
