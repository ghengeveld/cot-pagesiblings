Page siblings
=============

This Cotonti plugin lists all siblings of a page and allows easy navigation to 
previous/next page.

Usage Example
-------------

<!-- BEGIN: SIBLINGS -->
<ul id="siblings">
 <!-- BEGIN: SIBLING -->
 <li class="{PAGE_SIBLING_ODDEVEN}">
  <a href="{PAGE_SIBLING_URL}"<!-- IF {PAGE_SIBLING_ISCURRENT} --> style="font-weight:bold;"<!-- ENDIF -->>{PAGE_SIBLING_NUM}. {PAGE_SIBLING_TITLE} ({PAGE_SIBLING_AUTHOR})</a>
 </li>
 <!-- END: SIBLING -->
</ul>
<!-- END: SIBLINGS -->
