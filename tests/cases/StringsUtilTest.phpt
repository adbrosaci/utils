<?php declare(strict_types = 1);

namespace Adbros\Utils\Tests;

use Adbros\Utils\StringsUtil;
use Ninjify\Nunjuck\TestCase\BaseTestCase;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

/**
 * @testCase
 */
class StringsUtilTest extends BaseTestCase
{

	/**
	 * @dataProvider getAnonymizeEmailData
	 */
	public function testAnonymizeEmail(string $value, string $expected): void
	{
		Assert::same($expected, StringsUtil::anonymizeEmail($value));
	}

	/**
	 * @return mixed[]
	 */
	public function getAnonymizeEmailData(): array
	{
		return [
		[
			'john.doe@domain.com',
		'jo*****e@domain.com',
		],
		[
			'jdoe@domain.com',
		'jd*e@domain.com',
		],
		[
			'doe@domain.com',
		'doe@domain.com',
		],
		[
			'do@domain.com',
		'do@domain.com',
		],
		[
			'd@domain.com',
		'd@domain.com',
		]];
	}

}

(new StringsUtilTest())
	->run();
