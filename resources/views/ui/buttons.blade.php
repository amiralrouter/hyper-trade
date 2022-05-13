@extends("ui.layout")

@section('title','Buttons | UI')


@section("content")

    <div class="grid grid-cols-2 gap-4 mt-4">

        <x-panel title="Basic Button" >
            <x-button color="primary">Primary</x-button>
            <x-button color="secondary">Secondary</x-button>
            <x-button color="success">Success</x-button>
            <x-button color="danger">Danger</x-button>
            <x-button color="warning">Warning</x-button>
            <x-button color="info">Info</x-button>
            <x-button color="theme">Theme</x-button>
            <x-button color="reverse">Reverse</x-button>
        </x-panel>
        <x-panel title="Disabled Basic Buttons" > 
            <x-button color="primary" disabled>Primary</x-button>
            <x-button color="secondary" disabled>Secondary</x-button>
            <x-button color="success" disabled>Success</x-button>
            <x-button color="danger" disabled>Danger</x-button>
            <x-button color="warning" disabled>Warning</x-button>
            <x-button color="info" disabled>Info</x-button>
            <x-button color="theme" disabled>Theme</x-button>
            <x-button color="reverse" disabled>Reverse</x-button>
        </x-panel>
        <x-panel title="Rounded Buttons" >  
            <x-button color="primary" rounded>Primary</x-button>
            <x-button color="secondary" rounded>Secondary</x-button>
            <x-button color="success" rounded>Success</x-button>
            <x-button color="danger" rounded>Danger</x-button>
            <x-button color="warning" rounded>Warning</x-button>
            <x-button color="info" rounded>Info</x-button>
            <x-button color="theme" rounded>Theme</x-button>
            <x-button color="reverse" rounded>Reverse</x-button>
        </x-panel>
        <x-panel title="Pill Buttons" >   
            <x-button color="primary" pill>Primary</x-button>
            <x-button color="secondary" pill>Secondary</x-button>
            <x-button color="success" pill>Success</x-button>
            <x-button color="danger" pill>Danger</x-button>
            <x-button color="warning" pill>Warning</x-button>
            <x-button color="info" pill>Info</x-button>
            <x-button color="theme" pill>Theme</x-button>
            <x-button color="reverse" pill>Reverse</x-button>
        </x-panel>
        <x-panel title="Outlined Buttons" >   
            <x-button color="primary" outlined>Primary</x-button>
            <x-button color="secondary" outlined>Secondary</x-button>
            <x-button color="success" outlined>Success</x-button>
            <x-button color="danger" outlined>Danger</x-button>
            <x-button color="warning" outlined>Warning</x-button>
            <x-button color="info" outlined>Info</x-button>
            <x-button color="theme" outlined>Theme</x-button>
            <x-button color="reverse" outlined>Reverse</x-button>
        </x-panel>
        <x-panel title="Outlined Disabled Buttons" >   
            <x-button color="primary" outlined disabled>Primary</x-button>
            <x-button color="secondary" outlined disabled>Secondary</x-button>
            <x-button color="success" outlined disabled>Success</x-button>
            <x-button color="danger" outlined disabled>Danger</x-button>
            <x-button color="warning" outlined disabled>Warning</x-button>
            <x-button color="info" outlined disabled>Info</x-button>
            <x-button color="theme" outlined disabled>Theme</x-button>
            <x-button color="reverse" outlined disabled>Reverse</x-button>
        </x-panel>
        <x-panel title="Soft Buttons" >   
            <x-button color="primary" soft>Primary</x-button>
            <x-button color="secondary" soft>Secondary</x-button>
            <x-button color="success" soft>Success</x-button>
            <x-button color="danger" soft>Danger</x-button>
            <x-button color="warning" soft>Warning</x-button>
            <x-button color="info" soft>Info</x-button>
            <x-button color="theme" soft>Theme</x-button>
            <x-button color="reverse" soft>Reverse</x-button>
        </x-panel>
        <x-panel title="Disabled Soft Buttons" >   
            <x-button color="primary" soft disabled>Primary</x-button>
            <x-button color="secondary" soft disabled>Secondary</x-button>
            <x-button color="success" soft disabled>Success</x-button>
            <x-button color="danger" soft disabled>Danger</x-button>
            <x-button color="warning" soft disabled>Warning</x-button>
            <x-button color="info" soft disabled>Info</x-button>
            <x-button color="theme" soft disabled>Theme</x-button>
            <x-button color="reverse" soft disabled>Reverse</x-button>
        </x-panel>
        <x-panel title="Text Buttons" >   
            <x-button color="primary" text>Primary</x-button>
            <x-button color="secondary" text>Secondary</x-button>
            <x-button color="success" text>Success</x-button>
            <x-button color="danger" text>Danger</x-button> 
            <x-button color="warning" text>Warning</x-button>
            <x-button color="info" text>Info</x-button>
            <x-button color="theme" text>Theme</x-button>
            <x-button color="reverse" text>Reverse</x-button>
        </x-panel>
        <x-panel title="Disabled Text Buttons" >   
            <x-button color="primary" text disabled>Primary</x-button>
            <x-button color="secondary" text disabled>Secondary</x-button>
            <x-button color="success" text disabled>Success</x-button>
            <x-button color="danger" text disabled>Danger</x-button>
            <x-button color="warning" text disabled>Warning</x-button>
            <x-button color="info" text disabled>Info</x-button>
            <x-button color="theme" text disabled>Theme</x-button>
            <x-button color="reverse" text disabled>Reverse</x-button>
        </x-panel>
        <x-panel title="Button Sizes" >   
            <x-button color="primary" size="xs">X-Small</x-button>
            <x-button color="primary" size="sm">Small</x-button>
            <x-button color="primary">Default</x-button>
            <x-button color="primary" size="lg">Large</x-button>
        </x-panel>
        <x-panel title="Button Sizes With Icons" >   
            <x-button color="primary" icon="home" size="xs">X-Small</x-button>
            <x-button color="primary" icon="home" size="sm">Small</x-button>
            <x-button color="primary" icon="home">Default</x-button>
            <x-button color="primary" icon="home" size="lg">Large</x-button>
        </x-panel> 
        <x-panel title="Button Widths" >   
            <x-button color="primary" width="xs">X-Small</x-button>
            <x-button color="primary" width="sm">Small</x-button>
            <x-button color="primary" width="md">Medium</x-button>
            <x-button color="primary" width="lg">Large</x-button>
        </x-panel>
        <x-panel title="Block Button" >   
            <x-button color="primary" block>Block Button</x-button>
            <x-button color="primary" icon="home" block>Block Button</x-button>
        </x-panel>
        <x-panel title="Button With Icons" >    
            <div class="grid gap-4">
                <div>
                    <x-button color="primary" icon="home">Home</x-button> 
                    <x-button color="secondary" icon="home">Home</x-button> 
                    <x-button color="success" icon="home">Home</x-button> 
                </div>
                <div>
                    <x-button color="primary" icon="home" outlined>Home</x-button>  
                    <x-button color="secondary" icon="home" outlined>Home</x-button>
                    <x-button color="success" icon="home" outlined>Home</x-button>
                </div>
                <div>
                    <x-button color="primary" icon="home" soft>Home</x-button>  
                    <x-button color="secondary" icon="home" soft>Home</x-button>
                    <x-button color="success" icon="home" soft>Home</x-button>
                </div>
                <div>
                    <x-button color="primary" icon="home" text>Home</x-button>  
                    <x-button color="secondary" icon="home" text>Home</x-button>
                    <x-button color="success" icon="home" text>Home</x-button>
                </div>
            </div>
        </x-panel>
        <x-panel title="Icons Buttons" >    
            <div class="grid grid-cols-4 gap-4">
                <div>
                    <x-button color="primary" icon="home" />  
                    <x-button color="secondary" icon="home" />
                    <x-button color="success" icon="home" />
                    <x-button color="danger" icon="home" />
                    <x-button color="warning" icon="home" />
                    <x-button color="info" icon="home" />
                    <x-button color="theme" icon="home" />
                    <x-button color="reverse" icon="home" /> 
                </div>
                <div>
                    <x-button color="primary" icon="home" outlined/>  
                    <x-button color="secondary" icon="home" outlined/>
                    <x-button color="success" icon="home" outlined/>
                    <x-button color="danger" icon="home" outlined/>
                    <x-button color="warning" icon="home" outlined/>
                    <x-button color="info" icon="home" outlined/>
                    <x-button color="theme" icon="home" outlined/>
                    <x-button color="reverse" icon="home" outlined/> 
                </div>
                <div>
                    <x-button color="primary" icon="home" soft/>  
                    <x-button color="secondary" icon="home" soft/>
                    <x-button color="success" icon="home" soft/>
                    <x-button color="danger" icon="home" soft/>
                    <x-button color="warning" icon="home" soft/>
                    <x-button color="info" icon="home" soft/>
                    <x-button color="theme" icon="home" soft/>
                    <x-button color="reverse" icon="home" soft/> 
                </div>
                <div>
                    <x-button color="primary" icon="home" text/>  
                    <x-button color="secondary" icon="home" text/>
                    <x-button color="success" icon="home" text/>
                    <x-button color="danger" icon="home" text/>
                    <x-button color="warning" icon="home" text/>
                    <x-button color="info" icon="home" text/>
                    <x-button color="theme" icon="home" text/>
                    <x-button color="reverse" icon="home" text/> 
                </div>
                <div>
                    <x-button color="primary" icon="home" rounded/>  
                    <x-button color="secondary" icon="home" rounded/>
                    <x-button color="success" icon="home" rounded/>
                    <x-button color="danger" icon="home" rounded/>
                    <x-button color="warning" icon="home" rounded/>
                    <x-button color="info" icon="home" rounded/>
                    <x-button color="theme" icon="home" rounded/>
                    <x-button color="reverse" icon="home" rounded/> 
                </div>
                <div>
                    <x-button color="primary" icon="home" outlined rounded/>  
                    <x-button color="secondary" icon="home" outlined rounded/>
                    <x-button color="success" icon="home" outlined rounded/>
                    <x-button color="danger" icon="home" outlined rounded/>
                    <x-button color="warning" icon="home" outlined rounded/>
                    <x-button color="info" icon="home" outlined rounded/>
                    <x-button color="theme" icon="home" outlined rounded/>
                    <x-button color="reverse" icon="home" outlined rounded/> 
                </div>
                <div>
                    <x-button color="primary" icon="home" soft rounded/> 
                    <x-button color="secondary" icon="home" soft rounded/>
                    <x-button color="success" icon="home" soft rounded/>
                    <x-button color="danger" icon="home" soft rounded/>
                    <x-button color="warning" icon="home" soft rounded/>
                    <x-button color="info" icon="home" soft rounded/>
                    <x-button color="theme" icon="home" soft rounded/>
                    <x-button color="reverse" icon="home" soft rounded/>
                </div>
                <div>
                    <x-button color="primary" icon="home" text rounded/> 
                    <x-button color="secondary" icon="home" text rounded/>
                    <x-button color="success" icon="home" text rounded/>
                    <x-button color="danger" icon="home" text rounded/>
                    <x-button color="warning" icon="home" text rounded/>
                    <x-button color="info" icon="home" text rounded/>
                    <x-button color="theme" icon="home" text rounded/>
                    <x-button color="reverse" icon="home" text rounded/>
                </div>
                <div>
                    <x-button color="primary" icon="home" pill/>  
                    <x-button color="secondary" icon="home" pill/>
                    <x-button color="success" icon="home" pill/>
                    <x-button color="danger" icon="home" pill/>
                    <x-button color="warning" icon="home" pill/>
                    <x-button color="info" icon="home" pill/>
                    <x-button color="theme" icon="home" pill/>
                    <x-button color="reverse" icon="home" pill/> 
                </div>
                <div>
                    <x-button color="primary" icon="home" outlined pill/>  
                    <x-button color="secondary" icon="home" outlined pill/>
                    <x-button color="success" icon="home" outlined pill/>
                    <x-button color="danger" icon="home" outlined pill/>
                    <x-button color="warning" icon="home" outlined pill/>
                    <x-button color="info" icon="home" outlined pill/>
                    <x-button color="theme" icon="home" outlined pill/>
                    <x-button color="reverse" icon="home" outlined pill/> 
                </div>
                <div>
                    <x-button color="primary" icon="home" soft pill/> 
                    <x-button color="secondary" icon="home" soft pill/>
                    <x-button color="success" icon="home" soft pill/>
                    <x-button color="danger" icon="home" soft pill/>
                    <x-button color="warning" icon="home" soft pill/>
                    <x-button color="info" icon="home" soft pill/>
                    <x-button color="theme" icon="home" soft pill/>
                    <x-button color="reverse" icon="home" soft pill/>
                </div>
                <div>
                    <x-button color="primary" icon="home" text pill/> 
                    <x-button color="secondary" icon="home" text pill/>
                    <x-button color="success" icon="home" text pill/>
                    <x-button color="danger" icon="home" text pill/>
                    <x-button color="warning" icon="home" text pill/>
                    <x-button color="info" icon="home" text pill/>
                    <x-button color="theme" icon="home" text pill/>
                    <x-button color="reverse" icon="home" text pill/>
                </div>
                <div>
                    <x-button color="primary" icon="home" pill size="xs"/>  
                    <x-button color="secondary" icon="home" pill size="sm"/>
                    <x-button color="success" icon="home" pill />
                    <x-button color="danger" icon="home" pill size="lg"/>
                    <x-button color="warning" icon="home" pill size="xl"/> 
                </div>
                <div> 
                    <x-button color="primary" icon="home" outlined pill size="xs"/>
                    <x-button color="secondary" icon="home" outlined pill size="sm"/>
                    <x-button color="success" icon="home" outlined pill />
                    <x-button color="danger" icon="home" outlined pill size="lg"/>
                    <x-button color="warning" icon="home" outlined pill size="xl"/>
                </div>
                <div> 
                    <x-button color="primary" icon="home" soft pill size="xs"/>
                    <x-button color="secondary" icon="home" soft pill size="sm"/>
                    <x-button color="success" icon="home" soft pill />
                    <x-button color="danger" icon="home" soft pill size="lg"/>
                    <x-button color="warning" icon="home" soft pill size="xl"/>
                </div>
                <div> 
                    <x-button color="primary" icon="home" text pill size="xs"/>
                    <x-button color="secondary" icon="home" text pill size="sm"/>
                    <x-button color="success" icon="home" text pill />
                    <x-button color="danger" icon="home" text pill size="lg"/>
                    <x-button color="warning" icon="home" text pill size="xl"/>
                </div>
            </div>
        </x-panel>
        <x-panel title="Loading Buttons" >    
            <x-button color="primary" loading/>
            <x-button color="secondary" loading/>
            <x-button color="success" loading/>
            <x-button color="danger" loading/>
            <x-button color="warning" loading/>
            <x-button color="info" loading/>
            <x-button color="theme" loading/>
            <x-button color="reverse" loading/>
        </x-panel>
        <x-panel title="Loading Buttons Sizes" >    
            <x-button color="primary" loading size="xs"/> 
            <x-button color="secondary" loading size="sm"/>
            <x-button color="success" loading />
            <x-button color="danger" loading size="lg"/>
            <x-button color="warning" loading size="xl"/>
        </x-panel> 
        <x-panel title="Loading Button" >    
            <div class="grid gap-4">
                <div>
                    <x-button color="primary" icon="home" loading>Home</x-button> 
                    <x-button color="secondary" icon="home" loading>Home</x-button> 
                    <x-button color="success" icon="home" loading>Home</x-button> 
                </div>
                <div>
                    <x-button color="primary" icon="home" outlined loading>Home</x-button>  
                    <x-button color="secondary" icon="home" outlined loading>Home</x-button>
                    <x-button color="success" icon="home" outlined loading>Home</x-button>
                </div>
                <div>
                    <x-button color="primary" icon="home" soft loading>Home</x-button>  
                    <x-button color="secondary" icon="home" soft loading>Home</x-button>
                    <x-button color="success" icon="home" soft loading>Home</x-button>
                </div>
                <div>
                    <x-button color="primary" icon="home" text loading>Home</x-button>  
                    <x-button color="secondary" icon="home" text loading>Home</x-button>
                    <x-button color="success" icon="home" text loading>Home</x-button>
                </div>
            </div>
        </x-panel>

    </div>

@endsection