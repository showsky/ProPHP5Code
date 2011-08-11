<?
require_once("constants.phpm");
require_once("request.phpm");
require_once("constraint.phpm");
require_once("constraintfailure.phpm");


$strTemplateFile = "searchresults.phtml";

$displayHash = Array();

$objRequest = new request();
$objRequest->SetRedirectOnConstraintFailure(true);

$objConstraint = new constraint(CT_MINLENGTH, "3");
$objRequest->AddConstraint("typeOfSteak", VERB_METHOD_GET, $objConstraint);
$objConstraint = new constraint(CT_MAXLENGTH, "12");
$objRequest->AddConstraint("typeOfSteak", VERB_METHOD_GET, $objConstraint);
$objConstraint = new constraint(CT_PERMITTEDCHARACTERS, "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
$objRequest->AddConstraint("typeOfSteak", VERB_METHOD_GET, $objConstraint);

$objRequest->SetConstraintFailureDefaultRedirectTargetURL("/search.php");
$objRequest->TestConstraints();

# If we've got this far, tests have been passed - perform the search.
$displayHash["RESULTS"] = Array();
$arSteaks = array("fillet", "rump", "sirloin", "burnt");

for ($i=0; $i<=sizeof($arSteaks)-1; $i++) {
  if (!(strpos(trim(strtolower($arSteaks[$i])), strtolower(trim($objRequest->GetParameterValue("typeOfSteak")))) === false)) {
    array_push($displayHash["RESULTS"], $arSteaks[$i]);
  };
};

require_once($strTemplateFile);
exit(0);
?>
