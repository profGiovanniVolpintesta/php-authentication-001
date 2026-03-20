<?php
    function checkCoachVisualizeRights () { return checkRights("COACH_VISUALIZE"); }
    function checkCoachCreateRights () { return checkRights("COACH_CREATE"); }
    function checkUserVisualizeRights () { return checkRights("USER_VISUALIZE"); }
    function checkUserCreateRights () { return checkRights("USER_CREATE"); }

    function checkRights($rightsKey)
    {
        if (isset($_SESSION) && isset($_SESSION["rights"]))
        {
            $rightIndex = array_search($rightsKey, $_SESSION["rights"]);
            if ($rightIndex != NULL && $rightIndex != FALSE)
            {
                return true;
            }
        }
        return false;
    }
?>