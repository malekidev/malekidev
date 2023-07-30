<template>
    <input v-model="otpNumber" type="text" name="otp" class="hidden">
    <div ref="box" class="flex justify-center gap-3 p-1" dir="ltr">
        <input v-for="i in length" :key="i" type="text" maxlength="1" inputmode="numeric"
               class="border rounded
                border-gray-600
                w-9 p-2 font-extrabold
                text-center  focus:outline-0 focus:border-b-2"
               @keydown="(e) => handleEnter(e,i-1)"
               v-model="OtpValues[i-1]"
        >
    </div>
</template>
<script setup>
import {ref} from "vue";

const props = defineProps({
    length: {
        type: Number,
        default: 5
    },
    otp: {
        type: String,
        default: ''
    }
})
const box = ref()
const OtpValues = ref(props.otp.split(''));
const otpNumber = ref(props.otp)

function handleEnter(e, i) {
    e.preventDefault();
    const nums = box.value.children
    const keyPressed = e.key
    if (i > 0 && keyPressed === 'Backspace' && OtpValues.value[i] === null ) {
        OtpValues.value[i-1] = null
        nums[i - 1].focus()
    } else if(keyPressed === 'Backspace'){
        OtpValues.value[i] = null
    }
    else {
        const match = keyPressed.match(/^[0-9]$/)
        if (match) {
            OtpValues.value[i] = keyPressed
            if (i < props.length - 1) {
                nums[i + 1].focus()
            }

        }
    }
    otpNumber.value = OtpValues.value.join('')

}

</script>
