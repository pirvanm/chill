<template>


<div id="app">
    render took  {{ time }}ms
    <div
            v-for="n in 50000"
            :key="n">Hello World {{ n }}
    </div>
</div>
</template>

<script>
    export default {
        name: 'PerfTest',
        render (h) {
            const lines = []
            for (let i = 0; i < 500000; i++) {
                lines.push(<div>Hello World {i}</div>)
            }
            return (
                <div>
                {lines}
                </div>
        )
        }
    }
</script>