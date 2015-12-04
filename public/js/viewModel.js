var Vue = require('vue');
Vue.use(require('vue-resource'));

new Vue({
  el: '#v-app',
  debug: true,
  data: {
    addSkill: false,
    newSkill: {
      name: '',
      content: ''
    },
    skills: [],
    profile: {
      pitch: '',
      position: '',
      gender: '',
      website: '',
      city: '',
      country: ''
    }
  },

  methods: {
    createSkill: function () {
      this.skills.push({
          name: this.newSkill.name,
          content: this.newSkill.content
      });
      this.newSkill.name = '';
      this.newSkill.content = '';
    },
    deleteSkill: function (index) {
      this.skills.splice(index, 1)
    },
    saveProfile: function () {
      // save item (THE BELOW SHOULD WORK BUT LIB MAY HAVE BUG)
      // this.$http.post('/profile', this.data, function(data, status, request) {
      //       console.log(data);
      // }).error(function (data, status, request) {
      //       console.log(data);
      // });
      $.ajax({
        method: "POST",
        url: "/profile",
        data: this.data,
      }).done(function(data) {
        console.log(data);
      });
    }
  }
})
