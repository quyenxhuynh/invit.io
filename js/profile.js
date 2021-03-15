$('.heart-toggle').click(
    function() {
        $(this).find('i').toggleClass('fas far');
    }
);

$('.share-event').click(
    function() {
        // var copyText = "Event link placeholder";
        // copyText.select();
        // copyText.setSelectionRange(0, 99999); 
        // document.execCommand("copy");
        alert("Copied the text: Event link placeholder" );
    }
);