<template>
    <div class="lfa-menu">
        <span class="leading-[0.9]">Menu</span>
        <div class="lfa-menu-button">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</template>

<style scoped>
.lfa-menu {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}

.lfa-menu-button {
    display: flex;
    flex-wrap: wrap;
    gap: 2px;
    width: 16px;
}

.lfa-menu-button div {
    width: 4px;
    height: 4px;
    background: var(--color-accent);
}
</style>
