<?php

$parks = [];

/**
 * Empty parks
 *
 * @return int
 */
function emptyParks()
{
    global $parks;
    return 10 - count($parks);
}

/**
 * Print full parks
 *
 * @return int
 */
function fullParks()
{
    global $parks;
    return count($parks);
}

/**
 * Check status
 *
 * @param $id
 * @return string
 */
function checkExist($id)
{
    global $parks;
    if (in_array($id, $parks)) {
        return 'exist';
    }
    return 'not exist';
}

/**
 * Arrivals and Departures
 *
 * @param $id
 * @param bool $arrivals
 * @return string
 */
function operation($id, bool $arrivals)
{
    global $parks;
    // inputs
    if ($arrivals) {
        if (count($parks) == 2) {
            return "full";
        }
        $parks[] = $id;
        fullParks();
        return 'input';
    }
    // outputs
    $parks = array_diff($parks, array($id));
    return 'output';
}

// input 2 car with special ids
print_r(operation(1, true)); // input
echo PHP_EOL;
print_r(operation(10, true)); // input
echo PHP_EOL;

// output 1 car with special ids
echo operation(1, false); // output
echo PHP_EOL;

echo checkExist(10); // exist
echo PHP_EOL;

echo emptyParks(); // 9
echo PHP_EOL;

echo fullParks(); // 1
echo PHP_EOL;
