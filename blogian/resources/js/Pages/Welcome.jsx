import { Link, Head } from '@inertiajs/react';



export function Nav(props) {
    return (
      <nav className='absolute w-[100%]  h-[50px]'>
        <ul typeof='none' className='flex flex-row justify-around'>
            <li>
                {
                    props.user?  
                <a className='text-lg font-semibold font-mono transition-all duration-[800ms] hover:text-green-700' href='/profile'>{props.user.name}</a>
                :<a className='text-lg font-semibold font-mono transition-all duration-[800ms] hover:text-green-700' href={route('register')}>Register</a>
                }
            </li>
            <li>
                {
                    props.user?
                <a className='text-lg font-semibold font-mono transition-all duration-[800ms] hover:text-green-700' href={route('dashboard')}>DashBoard</a>
                : <a className='text-lg font-semibold font-mono transition-all duration-[800ms] hover:text-green-700' href={route('login')}>Login</a>
                }
            </li>
            <li><a className='text-lg font-semibold font-mono transition-all duration-[800ms] hover:text-green-700' href={route('postspath.index')}>Blog</a></li>
        </ul>
      </nav>
    )
}

function Logo() {
    return <img src='./imgs/logo.png' width={300} height={300} className='absolute top-[10%] lg:left-[40%] rounded-[50%] mt-5'></img>
}

function Section1() {
    return (
        <section className='absolute w-[100%] h-[800px] top-[50px] bg-green-200 ' style={{backgroundImage:"linear-gradient(to bottom , rgba(62, 182, 153, 1) , rgba(66, 180, 205, 1) , rgba(60, 128, 178, 1) , rgba(54, 75, 152, 1))" , backgroundPosition:"center" , backgroundSize:"cover"}}>
            <div className='flex flex-col items-center justify-center'>
                <img src='/imgs/logo.png' className='img-thumnail md:w-[35%] sm:w-[40%] rounded-[50%] mt-5'/>
                <h1 className='text-center text-white font-serif italic text-6xl absolute top-[70%] mt-[10%]  '>Welcome there</h1>
            </div>
        </section>
    )
}

function Section3() {
    return (
        <section className=' relative w-[100%] bg-white top-[40%] md:rounded-[32px]  ' style={{height:"50%"  }}>
            <h4 className='text-blue-700 text-center text-3xl relative top-3'>Our Responsers</h4>
            <div className='grid grid-cols-3  bg-white   gap-3 relative top-[5%] '>
               <img src='./imgs/companylogo1.jpg' width={200}  className='rounded-[50%] object-fit '></img>
               <img src='./imgs/companylogo2.jpg'  width={200} className='rounded-[50%] object-fit self-center'></img>
               <img src='./imgs/company4logo.png' width={200}  className='rounded-[50%] object-fit '></img>
            </div>
        </section>
    )
}

function Section2() {
    return (
        <section className=' absolute w-[100%] top-[130%]  h-[200px]  md:top-[150%] '
         >
            <article>
                <h1 className='text-center text-6xl text-white '>Welcome In Blogian</h1>
                <h2 className='text-center text-xl text-blue-900 text-white'>Feel Free To Be Your Self</h2>
                <div className='bg-white relative w-75 h-[200px] rounded-[32px] text-center mt-6 shadow-xl shadow-black'>
                    <p className='text-balck ' style={{color:"black"}}>
                        Here The Where For You To Post , Read , And Write Without Any Limitations 
                        And we hope that you will Enjoy Intreacting With It With Best Of Wishes Good Luck
                    </p>
                </div>
            </article>
            <Section3/>
        </section>
    )
}

function Section4() {
    return (
        <section className=' absolute top-[240%] md:top-[260%] w-[100%] ' style={{height:200}}>
            <div className='relative w-[100%] top-5   grid grid-cols-2 gap-[4%] justify-between '> 
            <div className='relative w-[50%] flex flex-row  order-1  sm:ml-3 '>
                <div className='lg:translate-x-[30%]'>
                    <p className='text-center text-lg w-[150px] h-[75px] ' style={{backgroundColor:"black" , borderRadius:"16px"}}>How Are You ?</p></div>
                <img src='./imgs/human.png ' className='rounded-[50%] lg:translate-x-[80%] ms-3' width={50} height={50}></img>
            </div>

            <div className='relative w-[50%] sm:left-[10%] md:translate-x-[60%] lg:translate-x-[90%]  flex flex-row gap-2 order-2 '>
                <div className='relative '>
                    <p className='text-center text-lg bg-black rounded-[16px] w-[150px] h-[75px] sm:justify-self-end' >I Am Fine , Thanks</p></div>
                <img src='./imgs/human.png ' className='rounded-[50%] ' width={50} height={50}></img>
            </div>

            </div>
            <div className='relative text-center bottom-[-30%]'>
                <a className='text-center text-xl text-white italic' href={route("register")}>Satrt Now </a>
            </div>
        </section>
    )
}

export function Footer() {
    return (
        <footer className=' w-full absolute w-[100%] top-[270%] md:top-[300%] ' style={{backgroundColor:"midnightblue"}}>
              <div className='relative w-100   grid grid-cols-2 gap-2 text-white' style={{backgroundColor:"midnightblue"}}>
               <div className='grid grid-rows-3 order-1'>
                <a className='order-1' href={route("register")}>Register</a>
                <a className='order-2' href={route("login")}>Login</a>
                <a className='order-3' href="#">Blog</a>
               </div>
               <div className='order-2   '>
                <h4 className='text-start text-3xl'>
                    All Copy Rights Is Saved For Blogain
                </h4>
                </div>
              </div>
              
        </footer>
    )
}




export default function Welcome({ auth, laravelVersion, phpVersion , user}) {
   

    return (
        <html>
            <head>
                
            </head>
            <body >
        <main className='w-[100%] '  >
            <header className=' absolute w-[100%]  '>       
            <Nav user={user}/>
           
          </header>
          <Section1/>
          <Section2/>
          <Section4/>
          <Footer/>
      </main>
            </body>
        </html>
    
    );
}
