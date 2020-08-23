<template>
  <div class="container">
    <div v-if="!url"
         class="dropArea"
         @dragenter="dragEnter"
         @dragleave="dragLeave"
         @dragover.prevent
         @drop="dropFile"
         :class="{ dropArea__enter: isEnter }">
      <span>ドロップエリア</span>
    </div>
    <img :src="url" v-if="url" alt="">
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
    }
  },
  mounted() {
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
          console.log('success')
          console.log(res.data)
          this.url = res.data.url
          this.imageId = res.data.id
        }).catch(error => {
          new Error(error)
        });
    },
  }
}
</script>
