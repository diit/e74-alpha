var Vue = require('vue');
Vue.use(require('vue-resource'));

new Vue({
  el: '#v-app',
  data: {
    skills: [
      {
        name: 'example',
        content: 'this and that'
      },
      {
        name: 'example',
        content: 'this and that'
      },
      {
        name: 'example',
        content: 'this and that'
      },
      {
        name: 'example',
        content: 'this and that'
      },
      {
        name: 'example',
        content: 'this and that'
      }
    ]
  },
  ready: function() {

    // save item
    // resource.save({id: 1}, {item: this.item}, function (data, status, request) {
    //     // handle success
    // }).error(function (data, status, request) {
    //     // handle error
    // })

  }
})
