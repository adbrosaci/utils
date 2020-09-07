<?php declare(strict_types = 1);

namespace Adbros\Utils\Tests;

use Adbros\Utils\ValidatorsUtil;
use Ninjify\Nunjuck\TestCase\BaseTestCase;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

/**
 * @testCase
 */
class ValidatorsUtilTest extends BaseTestCase
{

	/**
	 * @dataProvider getIsIpData
	 */
	public function testIsIp(string $value, bool $expected): void
	{
		Assert::same($expected, ValidatorsUtil::isIp($value));
	}

	/**
	 * @return mixed[]
	 */
	public function getIsIpData(): array
	{
		return [
		[
			'127.0.0.1',
		true,
		],
		[
			'192.168.0.1',
		true,
		],
		[
			'::1',
		true,
		],
		[
			'::ffff:c0a8:1',
		true,
		],
		[
			'domain.com',
		false,
		]];
	}

	/**
	 * @dataProvider getIsPasswordStrong
	 */
	public function testIsPasswordStrong(string $value, bool $expected): void
	{
		Assert::same($expected, ValidatorsUtil::isPasswordStrong($value));
	}

	/**
	 * @return mixed[]
	 */
	public function getIsPasswordStrong(): array
	{
		return [
		[
			'abcABC123',
		true,
		],
		[
			'abcabc123',
		false,
		],
		[
			'ABCABC123',
		false,
		],
		[
			'abcABCabc',
		false,
		]];
	}

}

(new ValidatorsUtilTest())
	->run();
