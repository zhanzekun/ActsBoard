export default {
    get_acts: "http://result.eolinker.com/fbFiZzv9414efdfae7eddc83e46172835b615b88246555c?uri=/activities/getacts",
    get_activity_by_id: function(id){
        return "http://result.eolinker.com/fbFiZzv9414efdfae7eddc83e46172835b615b88246555c?uri=/activities/getinfo?id={"+id+"}";
    },
    get_activity_after_select: function(time,type){
        return "..."
    },
    get_user_init_setting:"...",
    set_user_setting:"..."
}