<?php

use PHPUnit\Framework\TestCase;
use EditorconfigChecker\Fix\TrailingWhitespaceFix;

final class TrailingWhitespaceFixTest extends TestCase
{
    public function testTrim()
    {
        $originalFile = './Build/TestFiles/Fix/TrimTrailingWhitespace/original.php';
        $afterFixFile = './Build/TestFiles/Fix/TrimTrailingWhitespace/afterFix.php';
        $eolChar = "\n";

        /* spaces */
        TrailingWhitespaceFix::trim($originalFile, 0, $eolChar);
        /* mixed */
        TrailingWhitespaceFix::trim($originalFile, 1, $eolChar);
        /* tabs */
        TrailingWhitespaceFix::trim($originalFile, 2, $eolChar);
        $this->assertEquals(sha1_file($originalFile), sha1_file($afterFixFile));
        exec('git checkout -- ' . $originalFile);
    }
}
