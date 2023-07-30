<template>
    <input v-model="phoneNumber" type="text" name="phone" class="hidden">
    <div ref="box" class="flex justify-center gap-1 p-1" dir="ltr">
        <input v-for="i in length" :key="i" type="text" maxlength="1" inputmode="numeric"
               class="border-b
                border-gray-600
                sm:w-9 w-6 p-2
                text-center  focus:outline-0 focus:border-b-2"
               @keydown="(e) => handleEnter(e,i-1)"
               v-model="PhoneValues[i-1]"
        >
    </div>
</template>
<script setup>
import {ref} from "vue";

const props = defineProps({
    length: {
        type: Number,
        default: 11
    },
    phone: {
        type: String,
        default: ''
    }
})
const box = ref()
const PhoneValues = ref(props.phone.split(''));
const phoneNumber = ref(props.phone)

function handleEnter(e, i) {
    e.preventDefault();
    const nums = box.value.children
    const keyPressed = e.key
    if (i > 0 && keyPressed === 'Backspace' && PhoneValues.value[i] === null ) {
        PhoneValues.value[i-1] = null
        nums[i - 1].focus()
    } else if(keyPressed === 'Backspace'){
        PhoneValues.value[i] = null
    }
    else {
        const match = keyPressed.match(/^[0-9]$/)
        if (match) {
            PhoneValues.value[i] = keyPressed
            if (i < props.length - 1) {
                nums[i + 1].focus()
            }

        }
    }
    phoneNumber.value = PhoneValues.value.join('')

}

</script>
