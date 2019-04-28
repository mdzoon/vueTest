var pkPoll = Vue.component( 'pk-poll', {
    props: ['atts'],
    data: function() { return {
        selectedAnswer: null,
    } },
} );

var elements = document.querySelectorAll('[data-pk-atts]');
console.log(" PK.js!");

elements.forEach( function( element ) {
    console.log( element.getAttribute('data-pk-atts') );
    var atts = JSON.parse( element.getAttribute('data-pk-atts') );
    // Do something with this element and its `atts`
    
    var vm = new Vue( {
        el: element,
        created: function() {
            this.atts = atts;
        },
        template: `<div class="pk-container">\
                    \<pk-poll : atts="atts" />\
                    </div>`,
    } );
});

template:  `<div class="pk-poll">\
                <h2>{{atts.question}}</h2>\
                <div class="radio-group">\
                    <label v-for="( answer, key ) in atts.answers" :key="key"><input type="radio" v-model="selectedAnswer" :value="key" >{{answer}}</label>\
                </div>\
                <button @click="submitPoll">Submit</button>\
            </div>`,
