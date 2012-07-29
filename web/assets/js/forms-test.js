$(document).ready(function() {
   
var User = Backbone.Model.extend({
    schema: {
        name:       'Text',
        email:      { dataType: 'email', validators: ['required', 'email'] },
        start:      { type: 'DateTime' },
        contact:    { type: 'Object', subSchema: {
                        name: 'Text',
                        phone: {}
                    }},
        //address:    { type: 'NestedModel', model: Address },
        notes:      { type: 'List' }
    }
});

var Address = Backbone.Model.extend({});

var user = new User();

var FormView = Backbone.View.extend({
    render: function() {
        var form = new Backbone.Form({
            model: user
        }).render();
        $(this.el).append(form.el);

        return this;
    }
});
formView = new FormView({});
console.log(formView);
formView.render();
$('body').append(formView.el);
});
