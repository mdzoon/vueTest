var pkPoll = Vue.component( 'pk-poll', {
    template:
        `<div class="pk-poll">\
            <h2>{{atts.question}}</h2>\
            <div class="radio-group">\
                <label v-for="( answer, key ) in atts.answers" :key="key"><input type="radio" v-model="selectedAnswer" :value="key" >{{answer}}</label>\
            </div>\
            <button @click="submitPoll">Submit</button>\
        </div>`,
    props: ['atts'],
    data: function() { return {
        selectedAnswer: null,
    } },
    methods: {
        submitPoll: function() {
            if( null === this.selectedAnswer ) return; //do not run if no answer is selected
            var queryString = '?action=pk_submit_poll&id' + this.atts.id + '&answer=' + this.selectedAnswer;
            fetch( window.ajaxurl + queryString ).then( function() {
                this.$emit('submitted');
            }.bind(this) );
        }
    }
} );

var pkResults = Vue.component('pk-results', {
    template:
        `<div class="pk-results">\
            <h2>{{atts.question}}</h2>\
            <div class="results-group">\
                <p v-for="(answer, key) in atts.answers" :key="key">\
                <span>{{answer}} ({{getAnswerRatio(key)}})</span>\
                <span class="percentage-bar" :style="getAnswerStyle(key)"></span>\
                </p>\
            </div>\
        </div>`,
    props: ['atts'],
    data: function() { return {
        results: Object.assign( {}, this.atts.answers )
    } },
    created: function() {
        Object.keys( this.results ).forEach( function( key ) {
            this.results[key] = 0;
        }.bind(this))
    },
    mounted: function() {
        var queryString = '?action=pk_get_poll_data&id=' + this.atts.id
        fetch( window.ajaxurl + queryString )
            .then( function(response) { return response.json() } )
            .then( function(json) {
                this.resuts = json;
            }.bind(this) );
    },
    methods: {
        getAnswerRatio( key ) {
            var total = Object.values(this.results).reduce( function( acc, cur ) { return acc+cur; }, 0 );
            var count = parseInt(this.results[key], 10) || 0;
            return count + ' / ' + total;
        },
        getAnswerStyle( key ) {
            var total = Object.values(this.results).reduce( function( acc, cur ) { return acc+cur; }, 0 );
            var count = parseInt(this.results[key], 10) || 0;
            var percentage = (count / total) * 100;
            return 'width: '+ percentage + '%';
        }
    }
} );

var elements = document.querySelectorAll('[data-pk-atts]');

elements.forEach( function( element ) {
    console.log( element.getAttribute('data-pk-atts') ); //debug
    var atts = JSON.parse( element.getAttribute('data-pk-atts') );
    // Do something with this element and its `atts`
    
    var vm = new Vue( {
        el: element,
        template:
            `<div class="pk-container">\
                <pk-poll :atts="atts" @submitted="pollSubmitted=true" v-if="!pollSubmited"/>\
                <pk-results :atts="atts" v-else/>\
            </div>`,
        data: {
            pollSubmited: false
        },
        created: function() {
            this.atts = atts;
        },
    } );
});