/*
	By Osvaldas Valutis, www.osvaldas.info
	Available for use under the MIT License
*/

'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			var submitFile = document.getElementById('submit-files');
			if( this.files && this.files.length > 1 ){
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
				if(submitFile){
					document.getElementById('submit-files').style.display = 'inline';
				}
			}else{
				fileName = e.target.value.split( '\\' ).pop();
				if(submitFile){
					document.getElementById('submit-files').style.display = 'none';
				}
			}
			if( fileName ){
				label.querySelector( 'span' ).innerHTML = fileName;
				if(submitFile){
					document.getElementById('submit-files').style.display = 'inline';
				}
			}else{
				label.innerHTML = labelVal;
				if(submitFile){
					document.getElementById('submit-files').style.display = 'none';
				}
			}
		
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));