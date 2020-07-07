<template>
  <div class="flex mb-4 h-screen-85 ">
    <div class="w-4/5 bg-gray-400 h-full rounded-l-md p-3 flex flex-col">
      <h3 v-if="selectedContact">{{ selectedContact.name }}</h3>

      <div class="flex flex-col-reverse messages-container h-75 p-4" style="overflow: scroll">
        <div v-for="message in messages"
             :class="{
               'ml-auto bg-green-400': message.is_my_message,
               'mr-auto bg-blue-400': !message.is_my_message,
             }"
             class="w-auto rounded p-1 border-gray-400 mt-3"
        >
          <div class="px-4 py-2 m-2">{{ message.message }}</div>
        </div>
      </div>

      <div v-if="selectedContact" class="mt-auto flex flex-row">
        <textarea title="message" name="message" id="message" class="w-full rounded h-15 mr-4 p-3"
                  @keypress.enter.prevent="sendMessageToContact" v-model="message"></textarea>
        <button type="button" @click.stop.prevent="sendMessageToContact"
                class="ml-auto bg-blue-500 hover:bg-blue-400 text-white font-bold
                py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
          Enviar
        </button>
      </div>
    </div>

    <div class="w-1/5 bg-gray-500 h-full rounded-r-md">
      <button type="button"
              v-for="(contact, key) in contacts"
              class="w-full rounded border-gray-400 bg-gray-300 m-2 h-8 flex content-center flex-wrap p-3"
              @click="loadMessagesWithContact({key: parseInt(key), name: contact})">
        <span>{{ contact }}</span>
      </button>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'chat-component',
    props: {
      contacts: { type: Object, default: ({}) },
      userId: { type: Number, required: true },
    },
    data () {
      return {
        selectedContact: null,
        messages: [],
        message: '',
      }
    },
    mounted () {
      this.watchForMessages()
    },
    methods: {
      watchForMessages () {
        let topic = encodeURIComponent(`https://example.com/chat/users/${this.userId}/messages`)

        const eventSource = new EventSource('http://localhost:8083/.well-known/mercure?topic=' + topic, {
          withCredentials: true
        })

        eventSource.addEventListener('message', (messageEvent) => {
          if (!this.selectedContact) return

          const eventData = JSON.parse(messageEvent.data)

          let conversation = eventData.data.conversation
          if (conversation.sender_id === this.selectedContact.key) {
            this.appendMessage(false, conversation.message, this.userId)
          }
        })
      },

      async loadMessagesWithContact (contact) {
        this.selectedContact = contact
        const response = await axios.get(`/api/messages/${contact.key}`)
        this.messages = response.data.data
      },

      appendMessage (isMyMessage, message, targetId) {
        this.messages.unshift({
          id: null,
          is_my_message: isMyMessage,
          message,
          read: true,
          target_id: targetId,
        })
      },

      async sendMessageToContact () {
        if (!this.selectedContact || !this.message.length) {
          return
        }

        this.appendMessage(true, this.message, this.selectedContact.key)

        try {
          await axios.put(`/api/messages/${this.selectedContact.key}`, {
            target: this.selectedContact.key,
            message: this.message,
          })
        } catch (e) {
          // something failed, remove message
          this.messages.shift()
        } finally {
          this.message = ''
        }
      },
    },
  }
</script>
