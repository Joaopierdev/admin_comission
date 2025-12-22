<template>
    <div class="card">
        <div class="card-header">{{ titulo }}
            <slot name="header"></slot>
        </div>

        <div class="card-body">
            <slot name="content"></slot>
        </div>

        <div class="card-footer">   
            <slot name="footer"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo']

    }
</script>
