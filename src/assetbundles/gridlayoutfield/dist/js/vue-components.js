//import Vue from 'vue';

// VARIABLES
let vueData = {};
let vueMethods = {};
window.VueEvent = new Vue();

// Grid
Vue.component('grid', {
    data() {
        return { tabs: [] };
    },
    created() {

    },
    methods: {
    },
    mounted(){
        //console.log("grid field vue fired");
    },
    template: `
    <div id="grid_field">
        <slot></slot>
    </div>
    `,
});

Vue.component('row', {
    data() {
        return { 
            rowPos: false, 
            boolean:true,
        };
    },
    props:{
        rowPosition: false,
    },
    created() {

    },
    methods: {
    },
    mounted(){
        this.rowPos = this.rowPosition;
        //console.log("row vue fired");
    },
    template: `
    <div class="grid_layout_field_type__row" :class="'grid_layout_field_type__row--' + rowPos">
        <slot></slot>
    </div>
    `,
});

Vue.component('column', {
    data() {
        return { 
            colPos: false,
            rowPos: false,
            highlighted: false,
        };
    },
    props:{
        columnPosition: false,
        rowPosition: false,
        isHighlighted: false,
        fieldId: false
    },
    created() {

    },
    methods: {
        highlight(){
            this.highlighted = this.highlighted == true ? false : true;
            console.log(this.highlighted);
            VueEvent.$emit('grid-item-highlighted', this.colPos, this.rowPos, this.fieldId);
        }
    },
    mounted(){
        this.colPos = this.columnPosition;
        this.rowPos = this.rowPosition;
        this.highlighted = this.isHighlighted;
        //console.log("column vue fired");
    },
    template: `
    <div @click='highlight' class="grid_layout_field_type__row__column" :class="['grid_layout_field_type__row__column--' + colPos, highlighted ? 'grid_item__highlighted' : '']">
        <slot></slot>
    </div>
    `,
});

Vue.component('grid-input', {
    data() {
        return { 
            checked: false,
            colPos: false,
            rowPos: false,
        };
    },
    props:{
        rowPosition: false,
        columnPosition: false,
        isChecked: false,
        fieldId: false,
    },
    created() {

    },
    methods: {
    },
    mounted(){
        //console.log(this.isChecked);
        this.checked = this.isChecked;
        this.colPos = this.columnPosition;
        this.rowPos = this.rowPosition;
        VueEvent.$on('grid-item-highlighted', (highlightedColumnPositionColumn, highlightedColumnPositionRow, IdOfField) => {
            if(IdOfField == this.fieldId){
                console.log("True. Id of Field: " + IdOfField + ". Field Id: " + this.fieldId);
                if(this.colPos == highlightedColumnPositionColumn && this.rowPos == highlightedColumnPositionRow){
                    this.checked = this.checked == true ? false : true;
                }
            }
            
        });
    },
    template: `
    <input type="checkbox" v-model="checked" class="grid_field_type__checkbox"></input>
    `,
});

// VUE INSTANCE
new Vue({
    el: '#fields',
    data: vueData,
    created: function () {
    },
    methods: vueMethods,
    mounted: function () {
    },
    delimiters: ['${', '}'],
});