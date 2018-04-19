<template><div>
  <div>{{act.name}}</div>
  <div>{{act.act_detail}}</div>
  <img :src="act.url" alt="">
  <div class="blue-circle"></div>
  <div>截止至： {{act.valid_date}}</div>
  <div class="blue-circle"></div>
  <div>活动类型： {{act.type}}</div>
  <div class="blue-circle"></div>
  <div>活动地点：  {{act.location}}</div>
  <div class="blue-circle"></div>
  <div>参与方式：{{act.apply_way}}</div>
  <div class="blue-circle"></div>
  <div>活动所属学校：  {{act.school}}</div>
  <button>分享一下</button>
</div></template>

<script>
import { Selector } from "vux";
import axios from "axios";
export default {
  props: {
    id: {
      type: Object,
     // require: true,
      default: 0
    }
  },
  name: "tab",
  data() {
    return {
      value: "今天",
      act: {
        id: 1,
        type: "讲座",
        name: "这是页面初始模拟数据",
        valid_date: "2019-09-09",
        apply_way: "这是参与方式的模拟数据",
        school: "华南理工大学",
        taglist: "有趣,无聊,妹子多",
        url: "http://www.scut.edu.cn",
        litimg_url: "http://www.scut.edu.cn",
        pic_url: "http://www.scut.edu.cn",
        location: "华南理工大学",
        act_detail: "ActsBoard是一家五百强企业，融资400个亿..."
      }
    };
  },
  methods: {
    onChange() {
      // todo
    },
    get_activity_by_id(id) {
      var _this = this;
      axios
        .get(api.get_activity_by_id(id))
        .then(function(response) {
          console.log(response.data);

          // _this.activities = JSON.parse(response.data).data;
          _this.act = response.data.data;
          // console.log(_this.activities);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  mounted: function() {
    get_activity_by_id(this.id);
  }
};
</script>