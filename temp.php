<html>
    <body><template>
    <mdb-navbar position="top" color="orange" scrolling class="navbar-light lighten-5">
        <mdb-navbar-brand href="https://sourcelink.co.uk" target="_blank">
            <img alt="SourceLink" height="60" src="../../public/img/logo.png"/>
        </mdb-navbar-brand>
        <mdb-navbar-toggler>


            <mdb-navbar-nav right>

                <mdb-dropdown>
                    <mdb-dropdown-toggle slot="toggle" navlink tag="li" class="nav-item avatar" waves-fixed>
                        <mdb-icon icon="user-circle" v-if="!loggedIn"/>
                        <mdb-avatar v-else>
                            <img alt="profile-image" class="rounded-circle"
                                 :src="profile_image" style="width: 45px;"/>
                        </mdb-avatar>
                    </mdb-dropdown-toggle>
                    <mdb-dropdown-menu>
                        <mdb-dropdown-item :to="{ name: 'profile' }" v-if="loggedIn"> Profile</mdb-dropdown-item>
                        <mdb-dropdown-item :to="{ name: 'login' }" v-if="!loggedIn"> Login</mdb-dropdown-item>
                        <mdb-dropdown-item @click="logout" v-else>Log Out</mdb-dropdown-item>

                    </mdb-dropdown-menu>
                </mdb-dropdown>

            </mdb-navbar-nav>
        </mdb-navbar-toggler>
    </mdb-navbar>
</template></body>
</html>
