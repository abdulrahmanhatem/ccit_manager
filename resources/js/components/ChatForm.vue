
<template>
    <div>
        <span>
            Hello Accepting
            {{ user}}
        </span>
    </div>
</template>
<script type="application/javascript">
    export default {
        props: [
            'user'
        ] ,
    }
</script>