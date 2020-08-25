<template>
  <div class="form-group">
    <label for="post_media">アイキャッチ</label>
    <span v-if="error" class="text-danger d-block">{{ error }}</span>
    <div v-if="!url"
         class="dropArea"
         @dragenter="dragEnter"
         @dragleave="dragLeave"
         @dragover.prevent
         @drop="dropFile"
         :class="{ dropArea__enter: isEnter }">
      <span>ドロップエリア</span>
    </div>
    <button v-if="url" @click="close" type="button" class="close border-0" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <img class="d-block mw-100" :src="url" v-if="url" alt="">
    <input type="hidden" v-model="url" name="url">
    <input type="hidden" v-model="imageId" name="media_id">
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      isEnter: false,
      files: [],
      url: null,
      imageId: null,
      error: null,
    }
  },
  props: {
    seturl: {
      type: String,
      default: null,
    },
  },
  mounted() {
    this.url = this.seturl
    this.imageId = this.setid
  },
  methods: {
    dragEnter() {
      this.isEnter = true
    },
    dragLeave() {
      this.isEnter = false
    },
    dropFile() {
      this.isEnter = false
      this.files = [...event.dataTransfer.files]
      const form = new FormData()
      form.append('upload', this.files[0])
      axios.post('/admin/fileupload/', form, {
        'content-type': 'multipart/form-data'
      })
        .then(res => {
          if (res.data.uploaded) {
            console.log('success')
            this.url = res.data.url
            this.imageId = res.data.id
          } else {
            console.log(res.data.errors)
            for(let item in res.data.errors) {
              this.error = res.data.errors[item][0]
            }
          }
          console.log(res.data)
        }).catch(error => {
          this.error = error
        });
    },
    close() {
      this.url = null
      this.imageId = null
    },
  }
}
</script>
