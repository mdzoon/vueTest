( function() {
    new Vue({
        el: document.querySelector('#app'),
        template: `
            <div style="padding:10px; background-color:lightblue;">
                <p>Vue template container</p>
            </div>
        `,
        mounted: function(){
        console.log("WP Vue Theme!");
        }
    });
})();