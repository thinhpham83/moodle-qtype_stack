<?php
// This file is part of STACK - http://stack.maths.ed.ac.uk//
//
// Stack is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Stack is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Stack.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Add in all the tests from studentinput.php into the unit testing framework.
 * While these are exposed to users as documentation, the Travis integration should also
 * run all the tests.
 *
 * @copyright  2016 The University of Edinburgh
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/../locallib.php');
require_once(__DIR__ . '/../stack/answertest/controller.class.php');
require_once(__DIR__ . '/../stack/options.class.php');
require_once(__DIR__ . '/fixtures/test_base.php');
require_once(__DIR__ . '/fixtures/inputfixtures.class.php');

/**
 * Unit tests for all answertests.
 *
 * @copyright  2016 The University of Edinburgh
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @group qtype_stack
 */
class stack_studentinput_test extends qtype_stack_testcase {

    /**
     * @dataProvider studentinput_fixtures
     */
    public function test_studentinput($testrep, $result) {

        $this->assertTrue($result->passed);
        $this->assertEquals($test->display, $test->casdisplay);
        $this->assertEquals($test->ansnotes, $test->casnotes);

    }

    public function studentinput_fixtures() {

        $tests = stack_inputvalidation_test_data::get_raw_test_data();

        $testdata = array();
        foreach ($tests as $data) {
            $test = stack_inputvalidation_test_data::test_from_raw($data);
            $result = stack_inputvalidation_test_data::run_test($test);

            $testrep = $test->rawstring;
            $testdata[] = array($testrep, $result);
        }
        return $testdata;
    }
}