<?php
    function checkCoachVisualizeRights () { return checkRights("COACH_VISUALIZE"); }
    function checkCoachCreateRights () { return checkRights("COACH_CREATE"); }
    function checkUserVisualizeRights () { return checkRights("USER_VISUALIZE"); }
    function checkUserCreateRights () { return checkRights("USER_CREATE"); }

    function checkRights($rightsKey)
    {
        if (isset($_SESSION) && isset($_SESSION["rights"]))
        {
            $elemExists = in_array($rightsKey, $_SESSION["rights"]);
            return $elemExists;
        }
        return false;
    }
?>