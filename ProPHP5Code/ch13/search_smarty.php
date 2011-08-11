require_once("constants.phpm");
require_once("request.phpm");
require_once("constraint.phpm");
require_once("constraintfailure.phpm");

$strTemplateFile = "s_search.tpl";

require('Smarty.class.php');
$objSmarty = new Smarty;

$objRequest = new request();
$blHadProblems = ($objRequest->IsRedirectFollowingConstraintFailure());

if ($blHadProblems) {
	$objSmarty->assign("HADPROBLEMS", "true");
};

if ($blHadProblems) {
  $objFailingRequest = $objRequest->GetOriginalRequestObjectFollowingConstraintFailure();
  $arConstraintFailures = $objFailingRequest->GetConstraintFailures();
  $problemArray = Array();
  for ($i=0; $i<=sizeof($arConstraintFailures)-1; $i++) {
    $objThisConstraintFailure = &$arConstraintFailures[$i];
    $objThisFailingConstraintObject = $objThisConstraintFailure->GetFailedConstraintObject();
    $intTypeOfFailure = $objThisFailingConstraintObject->GetConstraintType();
    switch ($intTypeOfFailure) {
      case CT_MINLENGTH:
        $problemArray[] = "Your search term was too short.";
        break;        
      case CT_MAXLENGTH:
        $problemArray[] = "Your search term was too long.";
        break;
      case CT_PERMITTEDCHARACTERS:
        $problemArray[] = "Your search term contained characters I didn't understand.";
        break;
    };
  };
};
if ($problemArray) {
	$objSmarty->assign("PROBLEMS", $problemArray);
};
$objSmarty->display($strTemplateFile);
