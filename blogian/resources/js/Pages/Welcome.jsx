import { Link, Head } from '@inertiajs/react';



export function Nav() {
    return (
       <nav className='w-100 absolute mt-5 '>
        <ul typeof='none' className='flex flex-row absolute w-100 lg:gap-[300%] gap-[100%] lg:translate-x-[300%] translate-x-[50%] ' >
        <li><a className='hover:text-green-800 transition-all duration-[800ms] text-xl' href={route('register')}>Register</a></li>
        <li><a className='hover:text-green-800 transition-all duration-[800ms] text-xl' href={route('login')}>Login</a></li>       
        </ul>        
       </nav>
    )
}

function Logo() {
    return <img src='./imgs/logo.png' width={300} height={300} className='absolute top-[10%] lg:left-[40%] rounded-[50%] mt-5'></img>
}

function Section1() {
    return (
        <section className='absolute w-100 top-[20%] lg:left-[30%] grid grid-rows-2 gap-4  '>
            <img src='./imgs/logo.png' width={300} height={300} className='relative  left-[20%]  rounded-[50%] mt-5 order-1'></img>
            <img src='./imgs/sec1_img.png' className='relative  rounded-[64px]  order-2 lg:w-[800px] lg:left-[-10%] ' width={500} height={500}></img>
        </section>
    )
}

function Section3() {
    return (
        <section className=' relative w-100 bg-white top-[20%] md:rounded-[32px]  ' style={{height:"50%"}}>
            <h4 className='text-blue-700 text-center text-3xl relative top-3'>Our Responsers</h4>
            <div className='grid grid-cols-3    gap-3 relative left-[2%] lg:left-[10%] top-[5%] '>
               <img src='./imgs/companylogo1.jpg' width={200}  className='rounded-[50%] object-fit '></img>
               <img src='./imgs/companylogo2.jpg'  width={200} className='rounded-[50%] object-fit self-center'></img>
               <img src='./imgs/company4logo.png' width={200}  className='rounded-[50%] object-fit '></img>
            </div>
        </section>
    )
}

function Section2() {
    return (
        <section className='w-100 absolute top-[150%] bg-white h-[200px] container'>
            <article>
                <h1 className='text-center text-6xl '>Welcome In Blogian</h1>
                <h2 className='text-center text-xl text-blue-900'>Feel Free To Be Your Self</h2>
                <div className='bg-white relative w-75 h-[200px] rounded-[32px] text-center mt-6 shadow-xl shadow-black'>
                    <p>
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
        <section className=' absolute top-[300%] container  ' style={{height:200}}>
            <div className='relative w-50 top-5   grid grid-cols-2 '> 
            <div className='relative w-50 flex flex-row gap-2 order-1'>
                <div className='lg:translate-x-[30%]'><p className='text-center text-lg  ' style={{backgroundColor:"lightgray" , borderRadius:"16px"}}>How Are You ?</p></div>
                <img src='./imgs/human.png ' className='rounded-[50%] lg:translate-x-[80%]' width={50} height={50}></img>
            </div>
            <div className='relative w-50 flex flex-row gap-2 order-2 '>
                <div className='lg:translate-x-[170%]'><p className='text-center text-lg bg-gray-200 rounded-[16px] '>I Am Fine , Thanks</p></div>
                <img src='./imgs/human.png ' className='rounded-[50%] lg:translate-x-[580%]' width={50} height={50}></img>
            </div>

            </div>
            <div className='relative text-center bottom-[-30%]'><a className='text-center text-xl text-blue-800' href={route("register")}>Satrt Now </a></div>
        </section>
    )
}

export function Footer() {
    return (
        <footer className=' absolute w-[100%] top-[340%] '>
              <div className='relative w-100 bg-blue-900 x  grid grid-cols-2 gap-2 text-white'>
               <div className='grid grid-rows-3 order-1'>
                <a className='order-1' href={route("register")}>Register</a>
                <a className='order-2' href={route("login")}>Login</a>
                <a className='order-3' href="#">Blog</a>
               </div>
               <div className='order-2 bg-blue-900  '>
                <h4 className='text-start text-3xl'>
                    All Copy Rights Is Saved For Blogain
                </h4>
                </div>
              </div>
              
        </footer>
    )
}




export default function Welcome({ auth, laravelVersion, phpVersion }) {
   

    return (
      <div className='container'>
        <header>
            <Nav/>
           
        </header>
        <Section1/>
        <Section2/>
        <Section4/>
        <Footer/>
      </div>
    );
}
