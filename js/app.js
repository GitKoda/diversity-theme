smoothScroll.init();

(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=927041417421957";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

jQuery(function() {
    jQuery('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        jQuery('#search').addClass('open');
        jQuery('#search > form > input[type="search"]').focus();
    });
    
    jQuery('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            jQuery(this).removeClass('open');
        }
    });
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyJdLCJuYW1lcyI6WyJzbW9vdGhTY3JvbGwiLCJpbml0IiwiZCIsInMiLCJpZCIsImpzIiwiZmpzIiwiZ2V0RWxlbWVudHNCeVRhZ05hbWUiLCJnZXRFbGVtZW50QnlJZCIsImNyZWF0ZUVsZW1lbnQiLCJzcmMiLCJwYXJlbnROb2RlIiwiaW5zZXJ0QmVmb3JlIiwiZG9jdW1lbnQiLCJqUXVlcnkiLCJvbiIsImV2ZW50IiwicHJldmVudERlZmF1bHQiLCJhZGRDbGFzcyIsImZvY3VzIiwidGFyZ2V0IiwidGhpcyIsImNsYXNzTmFtZSIsImtleUNvZGUiLCJyZW1vdmVDbGFzcyJdLCJtYXBwaW5ncyI6IkFBQUFBLGFBQWFDLE9BRVosU0FBU0MsRUFBR0MsRUFBR0MsR0FDZixHQUFJQyxHQUFJQyxFQUFNSixFQUFFSyxxQkFBcUJKLEdBQUcsRUFDcENELEdBQUVNLGVBQWVKLEtBQ3JCQyxFQUFLSCxFQUFFTyxjQUFjTixHQUFJRSxFQUFHRCxHQUFLQSxFQUNqQ0MsRUFBR0ssSUFBTSxpRkFDVEosRUFBSUssV0FBV0MsYUFBYVAsRUFBSUMsS0FDL0JPLFNBQVUsU0FBVSxrQkFFdEJDLE9BQU8sV0FDSEEsT0FBTyxxQkFBcUJDLEdBQUcsUUFBUyxTQUFTQyxHQUM3Q0EsRUFBTUMsaUJBQ05ILE9BQU8sV0FBV0ksU0FBUyxRQUMzQkosT0FBTyx5Q0FBeUNLLFVBR3BETCxPQUFPLGlDQUFpQ0MsR0FBRyxjQUFlLFNBQVNDLEdBQzNEQSxFQUFNSSxRQUFVQyxNQUFrQyxTQUExQkwsRUFBTUksT0FBT0UsV0FBeUMsSUFBakJOLEVBQU1PLFNBQ25FVCxPQUFPTyxNQUFNRyxZQUFZIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbInNtb290aFNjcm9sbC5pbml0KCk7XHJcblxyXG4oZnVuY3Rpb24oZCwgcywgaWQpIHtcclxuXHR2YXIganMsIGZqcyA9IGQuZ2V0RWxlbWVudHNCeVRhZ05hbWUocylbMF07XHJcblx0aWYgKGQuZ2V0RWxlbWVudEJ5SWQoaWQpKSByZXR1cm47XHJcblx0anMgPSBkLmNyZWF0ZUVsZW1lbnQocyk7IGpzLmlkID0gaWQ7XHJcblx0anMuc3JjID0gXCIvL2Nvbm5lY3QuZmFjZWJvb2submV0L2VuX1VTL3Nkay5qcyN4ZmJtbD0xJnZlcnNpb249djIuNiZhcHBJZD05MjcwNDE0MTc0MjE5NTdcIjtcclxuXHRmanMucGFyZW50Tm9kZS5pbnNlcnRCZWZvcmUoanMsIGZqcyk7XHJcbn0oZG9jdW1lbnQsICdzY3JpcHQnLCAnZmFjZWJvb2stanNzZGsnKSk7XHJcblxyXG5qUXVlcnkoZnVuY3Rpb24oKSB7XHJcbiAgICBqUXVlcnkoJ2FbaHJlZj1cIiNzZWFyY2hcIl0nKS5vbignY2xpY2snLCBmdW5jdGlvbihldmVudCkge1xyXG4gICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgalF1ZXJ5KCcjc2VhcmNoJykuYWRkQ2xhc3MoJ29wZW4nKTtcclxuICAgICAgICBqUXVlcnkoJyNzZWFyY2ggPiBmb3JtID4gaW5wdXRbdHlwZT1cInNlYXJjaFwiXScpLmZvY3VzKCk7XHJcbiAgICB9KTtcclxuICAgIFxyXG4gICAgalF1ZXJ5KCcjc2VhcmNoLCAjc2VhcmNoIGJ1dHRvbi5jbG9zZScpLm9uKCdjbGljayBrZXl1cCcsIGZ1bmN0aW9uKGV2ZW50KSB7XHJcbiAgICAgICAgaWYgKGV2ZW50LnRhcmdldCA9PSB0aGlzIHx8IGV2ZW50LnRhcmdldC5jbGFzc05hbWUgPT0gJ2Nsb3NlJyB8fCBldmVudC5rZXlDb2RlID09IDI3KSB7XHJcbiAgICAgICAgICAgIGpRdWVyeSh0aGlzKS5yZW1vdmVDbGFzcygnb3BlbicpO1xyXG4gICAgICAgIH1cclxuICAgIH0pO1xyXG59KTsiXSwic291cmNlUm9vdCI6Ii9zb3VyY2UvIn0=
