<?
require_once("constants.phpm");
require_once("request.phpm");
require_once("constraint.phpm");
require_once("constraintfailure.phpm");

$strTemplateFile = "search.phtml";

$displayHash = Array();

$objRequest = new request();
$blHadProblems = ($objRequest->IsRedirectFollowingConstraintFailure());

$displayHash["HADPROBLEMS"] = $blHadProblems;

if ($blHadProblems) {
  $objFailingRequest = $objRequest->GetOriginalRequestObjectFollowingConstraintFailure();
  $arConstraintFailures = $objFailingRequest->GetConstraintFailures();
  $displayHash["PROBLEMS"] = Array();
  for ($i=0; $i<=sizeof($arConstraintFailures)-1; $i++) {
    $objThisConstraintFailure = &$arConstraintFailures[$i];
    $objThisFailingConstraintObject = $objThisConstraintFailure->GetFailedConstraintObject();
    $intTypeOfFailure = $objThisFailingConstraintObject->GetConstraintType();
    switch ($intTypeOfFailure) {
      case CT_MINLENGTH:
        $displayHash["PROBLEMS"][] = "Your search term was too short.";
        break;        
      case CT_MAXLENGTH:
        $displayHash["PROBLEMS"][] = "Your search term was too long.";
        break;
      case CT_PERMITTEDCHARACTERS:
        $displayHash["PROBLEMS"][] = "Your search term contained characters I didn't understand.";
        break;
    };
  };
};

require_once($strTemplateFile);
exit(0);
?>