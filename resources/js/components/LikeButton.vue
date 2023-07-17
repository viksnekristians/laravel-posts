<template>
    <div>
        <button class="like-btn" :class="{ liked: status }" @click="likePost"  v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: [
            'postId',
            'likes',
            'likecount'
        ],
        mounted() {
            this.likesCount = this.likecount
        },
        data: function() {
            return {
                status: this.likes,
                likesCount: this.likeCount
            }
        },
    methods: {
        likePost() {
            axios.post('/like/' + this.postId)
            .then(response => {
                this.status = !this.status;
                this.likesCount = response.data[1];
            }).catch(errors =>
            {
                if(errors.response.status == 401) {
                    window.location = '/login';
                }
            });
        }
    },

    computed: {
        buttonText() {
            return (this.status) ? `Liked (${this.likesCount})` : `Like (${this.likesCount})`;
        }
    }
    }
</script>