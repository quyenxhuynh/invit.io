$('.heart-toggle').click(
    function() {
        $(this).find('i').toggleClass('fas far');
    }
);

$('.share-event').click(
    function() {
        const el = document.createElement('textarea');
        el.value = this.id;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        alert(this.id);


        // var copyText = 'test';
        // copyText.select();
        // copyText.setSelectionRange(0, 99999); 
        // document.execCommand("copy");
        // alert("Copied the text: Event link placeholder" );


    }
);