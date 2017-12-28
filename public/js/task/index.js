var table  = new Vue({
        el: "#app_content",
        data:{
                tasks: window.tasks,
        },
        methods:{
                format: function (date) {
                        // const moment = require('moment');
                        let m = moment();
                        m = moment(parseInt(date));
                        return m.lang("ru").format('D MMMM YYYY HH:mm');
                },
                deletePath: function (id) {
                    return "tasks/" + id;
                },
                editPath: function (id) {
                        return 'tasks/' + id + '/edit';

                }
        }

})
