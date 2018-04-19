<template>

</template>

<script>
import { Selector } from 'vux'
import axios from 'axios'
export default {
  name: "tab",
  data() {
    return {
      value: "今天",
      plainList: ['今天', '最近三天','最近一周','最近一月','本学期','本学年'],
    };
  },
  methods:{
    onChange(){
      // todo
    },
    get_activity_by_id(id){
      var _this = this;
      axios
        .get(
          api.get_acts
        )
        .then(function(response) {
          console.log(response.data);
        
         // _this.activities = JSON.parse(response.data).data;
          _this.activities = response.data.data;
          // console.log(_this.activities);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  mounted:function(){

  }
};
</script>