<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Ed's Search Page</title>
</head>

<body>
<H1>Ed's Search Page</H1>
<hr>
You can search for types of steak here.
<BR><BR>
{if $HADPROBLEMS}
 <B>Sorry, there were problems with your search!</B>
  {section name=x loop=$PROBLEMS}
    {$PROBLEMS[x]}
  {/section}
{/if}
<FORM METHOD="GET" ACTION="searchresults.php">
  <TABLE BORDER="0">
    <TR>
      <TD>Type of Steak</TD>
      <TD><INPUT TYPE="TEXT" NAME="typeOfSteak"></TD>
    </TR>
 </TABLE><BR>
 <INPUT TYPE="SUBMIT">
</FORM>
</body>
</html>
