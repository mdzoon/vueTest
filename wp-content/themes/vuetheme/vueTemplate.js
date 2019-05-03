( function() {
    new Vue ( {
        el: document.querySelector('#appTest'),
        template: `
            <div style="padding:10px; background-color:lightblue;">
                <p>Vue template container</p>
            </div>
        `,
        mounted: function() {
        console.log ("WP Vue Theme!") ;
        }
    } );
} )();