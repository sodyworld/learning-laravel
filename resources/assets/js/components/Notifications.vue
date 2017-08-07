<template>
    <div class="dropdown-menu">
        <a :href="'/user/'+notification.data.follower.username" class="dropdown item" v-for="notification in notifications">
            @{{notification.data.follower.username}} te ha seguido!
        </a>
    </div>
</template>
<script>
export default {
    props: ['user'],
    data()
    {
        return {
            notifications: []
        }
    },
    mounted(){
        var self = this
        axios.get('/api/notifications')
            .then(response =>{
                self.notifications = response.data;
                Echo.private(`App.User.${self.user}`)
                    .notification(notification => {
                        self.notifications.unshift(notification)
                    })
            }) 
        

    }
}
</script>