<?php

/**
 * @file
 * The PHP page that handles updating the Drupal installation.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt files in the "core" directory.
 */

use Drupal\Core\Update\UpdateKernel;
use Symfony\Component\HttpFoundation\Request;

$autoloader = require_once 'autoload.php';
$testCommit = 1234;
$nikietyka= 12345;
$new = 'abe pravq neshto monogo qko';
$test= 'niki pravi neshto nova...';
// Disable garbage collection during test runs. Under certain circumstances the
// update path will create so many objects that garbage collection causes
// segmentation faults.
if (drupal_valid_test_ua()) {
  gc_collect_cycles();
  gc_disable();
}

$kernel = new UpdateKernel('prod', $autoloader, FALSE);
$request = Request::createFromGlobals();

$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
