var Vue = require('vue');
var vueValidator = require('vue-validator');
var vueResource = require('vue-resource');

Vue.use(vueValidator);
Vue.use(vueResource);

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
    },
    errors: []
  },

  methods: {
    createSkill: function () {
      this.skills.push({
          name: this.newSkill.name,
          content: this.newSkill.content
      });
      this.newSkill.name = '';
      this.newSkill.content = '';
      this.addSkill = false;
    },
    deleteSkill: function (index) {
      this.skills.splice(index, 1)
    },
    saveProfile: function () {
      var fields = {
        'skills': this.skills,
        'profile': this.profile
      }
      var result = $.ajax({
        method: 'POST',
        url: '/profile',
        data: fields,
        dataType: 'json',
        success: function(data) {
          window.location.replace("/dashboard");
        },
        error: function(data) {
          console.log(data.responseJSON);
          return JSON.parse(data.responseJSON);
        }
      });
      this.errors.push(result);
    }
  }
})
