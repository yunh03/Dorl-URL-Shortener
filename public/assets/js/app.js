function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).html()).select();
    document.execCommand("copy");
    $temp.remove();
    alert("단축 URL을 클립보드에 복사했습니다. 원하는 곳에 붙여넣어 링크를 쉽게 공유할 수 있습니다.");
}