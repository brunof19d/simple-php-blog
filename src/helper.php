<?php

/**
 * Function that verifies if it has a method POST on the form
 * @param int Number of GET ID
 * @return bool
 */
function checkPost(): bool
{
    if (count($_POST) > 0) {
        return true;
    }
    return false;
}
