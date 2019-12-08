$(".option-part1").css("display", "none");
$(".option-part2").css("display", "none");
$(".option-part3").css("display", "none");
$("#oneTime").click(function(){
    $(".option-part1").css("display", "none");
    $(".option-part2").css("display", "block");
    $(".option-part3").css("display", "none");
    $(".input1").prop("disabled", true);
    $(".input2").prop("disabled", false);
    $(".input3").prop("disabled", true);
});
$("#reccureTime").click(function(){
    $(".input1").prop("disabled", false);
    $(".input2").prop("disabled", true);
    $(".input3").prop("disabled", true);
    $(".option-part1").css("display", "block");
    $(".option-part2").css("display", "none");
    $("#week").click(function(){
        $(".option-part2").css("display", "none");
        $(".option-part3").css("display", "block");
        $(".input2").prop("disabled", true);
        $(".input3").prop("disabled", false);
    });
    $("#otherWeek").click(function(){
        $(".option-part2").css("display", "none");
        $(".option-part3").css("display", "block");
        $(".input2").prop("disabled", true);
        $(".input3").prop("disabled", false);
    });
    $("#threeWeek").click(function(){
        $(".option-part2").css("display", "none");
        $(".option-part3").css("display", "block");
        $(".input2").prop("disabled", true);
        $(".input3").prop("disabled", false);
    });
    $("#oneMonth").click(function(){
        $(".option-part2").css("display", "block");
        $(".option-part3").css("display", "none");
        $(".input2").prop("disabled", false);
        $(".input3").prop("disabled", true);
    });
});