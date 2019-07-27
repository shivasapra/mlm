// Select the main list and add the class "hasSubmenu" in each LI that contains an UL
$('.tree-view ul').each(function(){
  $this = $(this);
  $this.find(".tree-view li").has(".tree-view ul").addClass("hasSubmenu");
});
// Find the last li in each level
$('.tree-view li:last-child').each(function(){
  $this = $(this);
  // Check if LI has children
  if ($this.children('.tree-view ul').length === 0){
    // Add border-left in every UL where the last LI has not children
    $this.closest('.tree-view ul').css("border-left", "1px solid gray");
    $this.closest('.tree-view ul').css("margin-top", "30px");
  } else {
    // Add border in child LI, except in the last one
    $this.closest('.tree-view ul').children(".tree-view li").not(":last").css("border-left","1px solid gray");
    // Add the class "addBorderBefore" to create the pseudo-element :defore in the last li
    $this.closest('.tree-view ul').children(".tree-view li").last().children("a").addClass("addBorderBefore");
    // Add margin in the first level of the list
    $this.closest('.tree-view ul').css("margin-top","20px");
    // Add margin in other levels of the list
    $this.closest('.tree-view ul').find(".tree-view li").children(".tree-view ul").css("margin-top","20px");
  };
});
// Add bold in li and levels above
$('.tree-view ul li').each(function(){
  $this = $(this);
  $this.mouseenter(function(){
    $( this ).children("a").css({"font-weight":"bold","color":"#336b9b"});
  });
  $this.mouseleave(function(){
    $( this ).children("a").css({"font-weight":"normal","color":"#428bca"});
  });
});
// Add button to expand and condense - Using FontAwesome
$('.tree-view ul li.hasSubmenu').each(function(){
  $this = $(this);
  $this.prepend("<a href='#'><i class='fa fa-minus-circle'></i><i style='display:none;' class='fa fa-plus-circle'></i></a>");
  $this.children("a").not(":last").removeClass().addClass("toogle");
});
// Actions to expand and consense
$('.tree-view ul li.hasSubmenu a.toogle').click(function(){
  $this = $(this);
  $this.closest("li").children("ul").toggle("slow");
  $this.children("i").toggle();
  return false;
});