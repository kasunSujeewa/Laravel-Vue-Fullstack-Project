<template>
  <div>
    <div v-for="post in posts" :key="post.id">
      <div v-if="post.image">
        <h1 class="mt-4">{{ post.postName }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{ post.user.name }}</a>
        </p>
        <div class="justify-content-end" v-if="post.user.id == user2.id">
          <div class="dropdown">
            <button
              class="btn btn-link dropdown-toggle"
              type="button"
              id="gedf-drop1"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="fa fa-ellipsis-h"></i>
            </button>
            <div
              class="dropdown-menu dropdown-menu-right"
              aria-labelledby="gedf-drop1"
            >
              <div class="h6 dropdown-header">Configuration</div>
              <button
                data-toggle="modal"
                data-target="#Edit_post"
                id="submit"
                class="dropdown-item"
              >
                Edit
              </button>
              <button
                class="dropdown-item"
                data-toggle="modal"
                data-target="#Delete_post"
              >
                Delete
              </button>
              <a class="dropdown-item" href="#">Report</a>
            </div>
          </div>
        </div>

        <hr />

        <!-- Date/Time -->
        <p>{{ post.created_at }}</p>

        <hr />

        <!-- Preview Image -->
        <img
          class="img-fluid rounded"
          :src="newPath + avatar + post.image"
          alt=""
        />

        <hr />

        <!-- Post Content -->
        <p class="lead">{{ post.description }}</p>

        <hr />
        <small
          ><span
            ><i class="fa fa-thumbs-o-up" aria-hidden="true"></i
            >{{ post.likes.length }}</span
          >
          <span
            ><i class="fa fa-thumbs-o-down" aria-hidden="true"></i
            >{{ post.dislikes.length }}</span
          >
          <span
            ><i class="fa fa-comments" aria-hidden="true"></i
            >{{ post.comment.length }}</span
          >
        </small>
        <like :id="post.id" :admin="user2"></like>

        <comment :post="post" :admin="user"></comment>
      </div>
      <div v-else>
        <h1 class="mt-4">{{ post.postName }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{ post.user.name }}</a>
        </p>
        <div class="justify-content-end" v-if="post.user.id == user2.id">
          <div class="dropdown">
            <button
              class="btn btn-link dropdown-toggle"
              type="button"
              id="gedf-drop1"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="fa fa-ellipsis-h"></i>
            </button>
            <div
              class="dropdown-menu dropdown-menu-right"
              aria-labelledby="gedf-drop1"
            >
              <div class="h6 dropdown-header">Configuration</div>
              <button
                data-toggle="modal"
                data-target="#Edit_post"
                id="submit"
                class="dropdown-item"
              >
                Edit
              </button>
              <button
                class="dropdown-item"
                data-toggle="modal"
                data-target="#Delete_post"
              >
                Delete
              </button>
              <a class="dropdown-item" href="#">Report</a>
            </div>
          </div>
        </div>
        <hr />

        <!-- Date/Time -->
        <p>{{ post.created_at }}</p>

        <hr />

        <!-- Preview Image -->

        <!-- Post Content -->
        <p class="lead">{{ post.description }}</p>

        <hr />
        <small
          ><span
            ><i class="fa fa-thumbs-o-up" aria-hidden="true"></i
            >{{ post.likes.length }}</span
          >
          <span
            ><i class="fa fa-thumbs-o-down" aria-hidden="true"></i
            >{{ post.dislikes.length }}</span
          >
          <span
            ><i class="fa fa-comments" aria-hidden="true"></i
            >{{ post.comment.length }}</span
          >
        </small>
        <like :id="post.id" :admin="user2"></like>

        <comment :post="post" :admin="user"></comment>
      </div>
    </div>
  </div>
</template>
<script>
import Like from "./like";
import comment from "./CommentForProfile";
export default {
  props: ["user", "user2"],
  components: {
    Like,
    comment,
  },
  data() {
    return {
      posts: [],
      avatar: "storage/",
      newPath: "../",
    };
  },
  mounted() {
    this.getPosts();
  },
  methods: {
    getPosts: function () {
      axios
        .get("/ownposts/" + this.user.id)
        .then((response) => {
          this.posts = response.data.ownPost;
        })
        .catch((error) => {
          this.error = error.response.data.message;
        });
    },
  },
};
</script>
